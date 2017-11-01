import React from 'react'

const ShelfCard = () => {
  return (
    <div className="grid-item card_wrapper">
      <div className="card_container">
          <p className="main_shelf_name">シェルフ</p>
          <p className="shelf_col_num"><span className="num">20</span>Collections</p>
      </div>
      <img className="picked_eyecatchs" src="" alt="" />
    </div>
  );
};

export default ShelfCard
