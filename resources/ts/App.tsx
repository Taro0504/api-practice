import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Home from './components/Home';
import Login from './components/Login';
import Register from './components/Register';
import ReactDOM from 'react-dom/client';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
      </Routes>
    </Router>
  );
}

const appElement = document.getElementById('app');

if (appElement) {
  // Appコンポーネントをマウント
  const root = ReactDOM.createRoot(appElement);
  root.render(<App />);
} else {
  console.error("Element with id 'app' not found!");
}

export default App;