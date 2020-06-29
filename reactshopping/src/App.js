import React, { Component } from "react";
import logo from "./logo.svg";
import "./App.css";
import Greet from "./Components/Greet";
import Cart from "./Components/Cart";
import { Container } from "react-bootstrap";

class App extends Component {
  render() {
    return (
      <Container className="App">
        <Greet name="Rishi Raj" />
        <Cart />
      </Container>
    );
  }
}

export default App;
