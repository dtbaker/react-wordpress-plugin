/* global window, document */
import React, { Component } from "react"
import ReactDOM from "react-dom"
import "core-js"
import SomePage from "./components/SomePage"

import "./global.scss"

class ReactWordPressPlugin extends Component {
  constructor(props) {
    super(props)
    this.state = {}
  }

  frontEndLoaded = (mountPoint, wordpressConfiguration) => {
    if (wordpressConfiguration) {
      ReactDOM.render(<SomePage someProp={wordpressConfiguration.someSettingFromPHP} />, mountPoint)
    }
  }
}

window.ReactWordPressPlugin = new ReactWordPressPlugin()
