/*
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.24.0/babel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react-dom.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/superagent/3.8.0/superagent.min.js"></script>
*/
//<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/react-bootstrap-table/4.1.5/react-bootstrap-table.min.css">
//<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react-bootstrap-table/4.1.5/react-bootstrap-table.min.js"></script>

/* 
 * The code on this file is licensed to NSF International
 * All rights reserved
 */


class Bs6920Reporting extends React.Component {
            constructor(){
                super();       
                
                this.state = {                   
                    reports:[]
                };
                
                
            }
            componentDidMount(){
                this.getReportingData();
            }
            getReportingData(){
                var self = this;
                const request = window.superagent; let valuenew=0;                
                let send_data = {load_step7_2: "get_step7_data"};
                request.post("model/bs6920_dashboard/bs6920_model.php")               
                .send(send_data)
                .end(function(err,resp){
                    if(err){
                        console.error(err);
                    }
                    else{
                        const newresponse = JSON.parse(resp.text);
                        console.log(newresponse);
                        self.setState({reports:newresponse});
                    }
                });
            }
            
            render(){
                var products = this.state.reports;
                function dataFormater(cell, row){
                return  cell;
              }
                return (
                         <BootstrapTable data={products} striped={true} hover={true}   hover={true}  condensed={true}  pagination={true} search={true} exportCSV={true}>
                            <TableHeaderColumn dataField="sample_number" dataFormat={dataFormater} isKey={true}  dataSort={true}>Sample Number</TableHeaderColumn>
                            <TableHeaderColumn dataField="pm" dataFormat={dataFormater} dataSort={true}>PM</TableHeaderColumn>
                            <TableHeaderColumn dataField="material" dataFormat={dataFormater} dataSort={true} >Material</TableHeaderColumn>
                            <TableHeaderColumn dataField="matlab" dataFormat={dataFormater} dataSort={true} >Matlab</TableHeaderColumn>
                            <TableHeaderColumn dataField="company" dataFormat={dataFormater} dataSort={true} >Company</TableHeaderColumn>
                            <TableHeaderColumn dataField="contactname" dataFormat={dataFormater} dataSort={true} >Contact Name</TableHeaderColumn>
                            <TableHeaderColumn dataField="testingfinish" dataFormat={dataFormater} dataSort={true} >Testing Finish</TableHeaderColumn>
                            <TableHeaderColumn dataField="filestatus" dataFormat={dataFormater} dataSort={true} >File Status</TableHeaderColumn>
                            <TableHeaderColumn dataField="edit" dataFormat={dataFormater} dataSort={true} >Edit</TableHeaderColumn>
                        </BootstrapTable>    
                                    );
            }
        }        
        ReactDOM.render(<Bs6920Reporting />,document.getElementById('bsreport'));
