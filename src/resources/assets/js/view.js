import React from 'react'
import ReactDOM from 'react-dom'
import { Route, BrowserRouter } from 'react-router-dom'

import Header from './components/Header'
import Footer from './components/Footer'

import Index from './components/Index'
import Single from './components/Single'
import Profile from './components/Profile'

ReactDOM.render((
    <BrowserRouter>
      <div>
        <Header />
        <Route exact path="/" component={Index} />
        <Route path="/single" component={Single} />
        <Route path="/profile" component={Profile} />
        <Footer />
      </div>
    </BrowserRouter>
  ),
  document.getElementById('app'));
