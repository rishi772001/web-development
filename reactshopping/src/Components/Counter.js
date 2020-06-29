import React, { Component } from "react";

class Counter extends Component {
  constructor(props) {
    super(props);

    this.state = {
      count: 0,
    };
  }
  increment = (prevstate) => {
    this.setState({ count: prevstate.count + 1 });
  };

  refresh = () => {
    this.setState({ count: 0 });
  };
  render() {
    return (
      <div>
        Counter value {this.state.count}
        <button onClick={this.increment}>Increase</button>
        <button onClick={this.refresh}>Refresh</button>
      </div>
    );
  }
}

export default Counter;
