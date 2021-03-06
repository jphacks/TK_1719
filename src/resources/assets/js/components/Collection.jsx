import React from 'react'
import { Link } from 'react-router-dom'

const Collection = () => {
  return (
    <div className="grid-item card_wrapper">
      <div className="card_container">
        <img className="profile_icon" src="" alt="" />
        <div className="card_container_right">
          <p className="profile_name">Natsuya Yada</p>
          <p className="shelf_name">アメリカンライフスタイル</p>
        </div>
      </div>
      <img className="card_eyecatch" src="" alt="" />
      <div className="card_container">
        <p className="card_title">かっこよすぎるバーベキューテク6選 - アウトドア初心者のパパでも簡単!</p>
      </div>
        <Link to="/single">
          <button className="save_button">シェルフへ</button>
        </Link>
    </div>
  );
}

export default Collection
