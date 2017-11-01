import React from 'react'
import ReactDOM from 'react-dom'
import Index from './components/Index'
import { Route, BrowserRouter } from 'react-router-dom'

ReactDOM.render((
    <BrowserRouter>
      <Route path="/" component={Index} />
    </BrowserRouter>
  ),
  document.getElementById('app'));
