import React from 'react'
import ShelfCard from './ShelfCard'

const Shelf = () => {
  return (
    <main className="clearfix">
      <div className="sub_header shelf">
        <h2 className="shelf_title">SHELF</h2>
        <p className="shelf_col_num">20 Collections</p>
      </div>
      <div className="grid">
        <ShelfCard />
      </div>
    </main>
  );
};

export default Shelf
