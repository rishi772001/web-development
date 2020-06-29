import React, { Component } from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import { Button, Table } from "react-bootstrap";

class ViewCart extends Component {
  constructor(props) {
    super(props);
  }

  handleplus = (item) => {
    this.props.plus(item);
  };
  handledelete = (item) => {
    this.props.delete(item);
  };
  handleminus = (item) => {
    this.props.minus(item);
  };

  render() {
    if (this.props.cart.length < 1) {
      return (
        <div>
          <h2 style={{ marginTop: "30px", textAlign: "center" }}>
            Your Cart is Empty...!
          </h2>
        </div>
      );
    }
    return (
      <div>
        <h2>Cart Menu : </h2>

        <Table striped bordered hover>
          <thead>
            <tr>
              <th>Id</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Plus</th>
              <th>Minus</th>
              <th>Delete</th>
              <th>Net Price</th>
            </tr>
          </thead>
          <tbody>
            {this.props.cart.map((item) => (
              <tr>
                <td>{item.id}</td>
                <td>{item.name}</td>
                <td>{item.price} /-</td>
                <td>{item.quantity}</td>
                <td>
                  <Button
                    onClick={() => this.handleplus(item)}
                    variant="secondary"
                    style={{ margin: "5px" }}
                  >
                    {" "}
                    +{" "}
                  </Button>
                </td>
                <td>
                  <Button
                    onClick={() => this.handleminus(item)}
                    variant="secondary"
                    style={{ margin: "5px" }}
                  >
                    {" "}
                    -{" "}
                  </Button>
                </td>
                <td>
                  <Button
                    onClick={() => this.handledelete(item)}
                    variant="danger"
                    style={{ margin: "5px" }}
                  >
                    Delete
                  </Button>
                </td>
                <td> {item.quantity * item.price}/-</td>
              </tr>
            ))}
          </tbody>
        </Table>

        <h4 style={{ marginTop: "20px" }}>Total Price = {this.props.total}</h4>
      </div>
    );
  }
}

export default ViewCart;
