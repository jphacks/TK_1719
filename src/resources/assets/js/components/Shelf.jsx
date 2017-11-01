import React from 'react'
import Header from './Header'
import ShelfCard from './ShelfCard'
import Footer from './Footer'

const Shelf = () => {
  return (
    <Header />
    <main className="clearfix">
      <div className="sub_header shelf">
        <h2 className="shelf_title">SHELF</h2>
        <p className="shelf_col_num">20 Collections</p>
      </div>
      <div className="grid">
        <ShelfCard />
      </div>
    </main>
    <Footer />
  );
};

export default Shelf
