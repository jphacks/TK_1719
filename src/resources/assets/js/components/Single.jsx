import React from 'react'

const Single = () => {
  return (
    <div>
      <main className="clearfix">
        <div className="single">
          <div className="card_wrapper">
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
            <a className="save_button" href="#">シェルフへ</a>
          </div>
          <div className="card_wrapper card_wrapper_next">
            <div className="card_container">
              <img className="profile_icon" src="" alt="" />
              <div className="card_container_right">
                <p className="card_collectors"><a href="">Toshiaki Matsumuraさん</a>と<a href="">その他</a>が保存しました</p>
              </div>
            </div>
          </div>
        </div>
    </main>
    </div>
  );
};

export default Single
