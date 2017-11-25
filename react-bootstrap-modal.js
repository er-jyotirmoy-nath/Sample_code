/*
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.24.0/babel.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react-dom.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react-bootstrap/0.31.5/react-bootstrap.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js'></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/superagent/3.8.0/superagent.min.js"></script>
        <script src="https://unpkg.com/react-day-picker/lib/daypicker.min.js"></script> 
        <link rel="stylesheet" href="https://unpkg.com/react-day-picker/lib/style.css"> 

*/

<script type="text/babel">
        class Datetime extends React.Component {
      constructor (props) {
        super(props)
        
      }
    
     
      render() {
     const DayPickerInput = window.DayPicker.Input;
     return(
    <div className="container">
        <p>Please type a day:</p>
       
    <DayPickerInput className="form-control"
            onDayChange={day => console.log(day)}
            placeholder="MM/DD/YYYY"
          />
    </div>);
      }
    }
        </script>

<script type="text/babel">
    class ModalEcample extends React.Component {
        constructor(props){
            super(props);
            this.state = { showModal: false };
        }

  close() {
    this.setState({ showModal: false });
  }

  open() {
    this.setState({ showModal: true });
  }

  render() {
    var Button = window.ReactBootstrap.Button;
     var Modal = window.ReactBootstrap.Modal;

    return (
      <div>
        <p>Click to get the full Modal experience!</p>

        <Button
          bsStyle="primary"
          bsSize="large"
          onClick={this.open.bind(this)}
        >
          Launch demo modal
        </Button>

        <Modal show={this.state.showModal} onHide={this.close.bind(this)}>
          <Modal.Header closeButton>
            <Modal.Title>Modal heading</Modal.Title>
          </Modal.Header>
          <Modal.Body>
          <Datetime />
            </Modal.Body>
          <Modal.Footer>
            <Button onClick={this.close.bind(this)}>Close</Button>
          </Modal.Footer>
        </Modal>
      </div>
    );
  }
};

ReactDOM.render(<ModalEcample />, document.getElementById('root2'));
    </script>
