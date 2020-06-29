import React, { Component } from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import { Alert } from "react-bootstrap";

class Greet extends Component {
  render() {
    return (
      <Alert
        variant="success"
        style={{ margin: "30px", marginRight: "10%", textAlign: "center" }}
      >
        Hi {this.props.name}, Welcome to Rishi's Shopping Cart
      </Alert>
    );
  }
}

export default Greet;
