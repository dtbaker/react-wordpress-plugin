import React from "react"
import styles from "./SomePage.module.css"

class SomePage extends React.PureComponent {
  constructor(props) {
    super(props)
    this.state = {
      meow: "foo",
    }
  }

  render() {
    const {meow} = this.state

    return (
      <div className={styles.wrap}>
        <div>
          Hey I'm react! Current state is: {meow}
        </div>
        <div>
          <button onClick={() => {
            this.setState({meow: meow === "foo" ? "bar" : "foo"})
          }}>Change State
          </button>
        </div>
      </div>
    )
  }
}

export default SomePage
