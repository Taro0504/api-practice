import React from 'react';
import { Link } from 'react-router-dom';

function Home() {
  return (
    <div className="flex h-screen">
      <div className="w-1/2 flex items-center justify-center">
        <img src="/path/to/your/image.jpg" alt="Description" className="max-w-full h-auto" />
      </div>
      <div className="w-1/2 flex flex-col items-center justify-center">
        <h1 className="text-2xl font-bold mb-4">Functional Lab</h1>
        <div className="flex flex-col space-y-4">
          <Link to="/login" className="px-4 py-2 bg-blue-500 text-blue rounded hover:bg-blue-600 w-40 text-center">ログイン</Link>
          <Link to="/register" className="px-4 py-2 bg-blue-500 text-blue rounded hover:bg-blue-600 w-40 text-center">新規登録</Link>
        </div>
      </div>
    </div>
  );
}

export default Home;