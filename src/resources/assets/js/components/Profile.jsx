import React from 'react'
import ShelfCard from './ShelfCard'

const User = () => {
  return (
    <div>
      <main className="clearfix">
        <div className="sub_header">
          <div className="sub_header_container">
            <div className="sh_icon_wrapper">
              <img className="profile_icon" src="" alt="" />
            </div>
            <div className="sh_info_wrapper">
              <h1 className="sh_user_name">Natsuya Yada<i className="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
              <p>フォロー</p>
              <p className="container_a">
                <a id="fr_usr_num" href="#"><span className="num">5</span>ユーザー</a>
                <a id="fr_shl_num" href="#"><span className="num">5</span>シェルフ</a>
              </p>
            </div>
          </div>
        </div>
        <div className="grid clearfix">
          <div className="container_a">
            <h2 className="my_shelf_title">マイシェルフ</h2>
            <a className="card_new_shelf" href="#">add new</a>
          </div>
          <ShelfCard />
        </div>
      </main>
    </div>
  );
};

export default User
