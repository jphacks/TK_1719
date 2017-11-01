import React from 'react'
import Header from './Header'
import Card from './Card'

const Index = () => {
  return (
    <div>
      <Header />
      <main className=''>
        <div className="grid">
          <Card />
          <Card />
          <Card />
        </div>
      </main>
    </div>
  );
};

export default Index
