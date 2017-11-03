import React from 'react'
import { Link } from 'react-router-dom'

const Header = () => {
  return (
    <header>
      <div className="h_container clearfix">
        <div className="h_searchbox_wrapper">
          <i className="h_searchbox_icon fa fa-search" aria-hidden="true"></i>
          <input type="text" name="" value="" />
        </div>
        <div className="h_profile_wrapper">
          <Link to="/profile">
            <img className="profile_icon" src="" alt="" />
            <p className="profile_name" >Natsuya Yada</p>
          </Link>
        </div>
        <div className="h_addnew_button">
          <i className="fa fa-plus" aria-hidden="true"></i>
        </div>
      </div>
    </header>
  );
};

export default Header
