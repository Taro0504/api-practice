import React from 'react';
import { useForm, SubmitHandler } from 'react-hook-form';
import { useNavigate } from 'react-router-dom';

type FormData = {
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
    <div className="min-h-screen bg-green-100 flex items-center justify-center">
      <form 
        onSubmit={handleSubmit(onSubmit)}
        className="bg-white p-8 rounded-lg shadow-md w-96"
      >
        <h1 className="bg-gray-300 text-gray-700 p-4 text-center mb-4">
          Functional Lab
        </h1>
        <div className="mb-4 relative flex flex-col items-center">
          <label className="block text-gray-700 mb-2">Email</label>
          <input 
            {...register('email', { required: true })}
            className="w-full p-2 border-b border-green-500 bg-transparent text-gray-700"
            placeholder="Email Address"
          />
          {errors.email && <span className="text-red-500 text-sm mt-1">メールアドレスを入力してください</span>}
        </div>
        <div className="mb-4 relative flex flex-col items-center">
          <label className="block text-gray-700 mb-2">Password</label>
          <input 
            type="password" 
            {...register('password', { required: true })}
            className="w-full p-2 border-b border-green-500 bg-transparent text-gray-700"
            placeholder="Password"
          />
          {errors.password && <span className="text-red-500 text-sm mt-1">パスワードを入力してください</span>}
        </div>
        <div className="flex justify-center">
          <button 
            type="submit"
            className="w-full bg-green-500 text-gray p-2 rounded-md hover:bg-green-600"
          >
            新規登録
          </button>
        </div>
      </form>
    </div>
  );
}

export default Register;
