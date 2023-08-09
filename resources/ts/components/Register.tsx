import React from 'react';
import { useForm, SubmitHandler } from 'react-hook-form';
import { useNavigate } from 'react-router-dom';

type FormData = {
  name: string;
  email: string;
  password: string;
};

function Register() {
  const { register, handleSubmit, formState } = useForm<FormData>();
  const { errors } = formState;
  const navigate = useNavigate();

  const onSubmit: SubmitHandler<FormData> = async (data) => {
    try {
      const response = await fetch('/api/users', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      });
      const result = await response.json();
      if (result.id) {
        navigate('/login');
      } else {
        // エラーメッセージ
      }
    } catch (error) {
      console.error('登録エラー:', error);
    }
  };

  return (
    <div>
      <form onSubmit={handleSubmit(onSubmit)}>
        <div>
          <label>名前</label>
          <input {...register('name', { required: true })} />
          {errors.name && <span>このフィールドは必須です</span>}
        </div>
        <div>
          <label>メールアドレス</label>
          <input {...register('email', { required: true })} />
          {errors.email && <span>このフィールドは必須です</span>}
        </div>
        <div>
          <label>パスワード</label>
          <input type="password" {...register('password', { required: true })} />
          {errors.password && <span>このフィールドは必須です</span>}
        </div>
        <button type="submit">新規登録</button>
      </form>
    </div>
  );
}

export default Register;
