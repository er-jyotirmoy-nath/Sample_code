/* 
 * The code on this file is licensed to NSF International
 * All rights reserved
 */

/* 
 * The code on this file is licensed to NSF International
 * All rights reserved
 */

class Sliderbutton extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            sendval: '',
            samplenumber: '',
            typerem: '',
            disabled:this.props.disabled
        };
        this.setInvoiceReminder = this.setInvoiceReminder.bind(this);
    }

    setInvoiceReminder(e) {

        this.setState({sendval: e.target.value, samplenumber: this.props.samplenumber, typerem: this.props.typeid,disabled:"disabled"},() => {
            const request = window.superagent;
        let send_data = this.state;
        request.post("model/savereminder.php")
                .send(send_data)
                .end(function (err, resp) {
                    if (err) {
                        console.error(err);
                    } else {
                        console.log(resp.text);

                    }
                });
        });

        
        
    }
    render() {
        return(
                <div>
                    <label className="switch">
                        <input type="checkbox" value="1" onChange={this.setInvoiceReminder.bind(this)} disabled={this.state.disabled}/>
                        <span className="slider round"></span>
                    </label>
                </div>
                );
    }
}

class InvoiceRep extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            quotations: [],
            disabled:''
        };
        

    }
    componentWillMount() {
        this.getAllQuotations();
    }
    getAllQuotations() {
        var self = this;
        const request = window.superagent;
        let send_data = {load_quotations: "get"};
        
        request.post("pams_history_report/eventManageClass.php")
                .send(send_data)
                .end(function (err, resp) {
                    if (err) {
                        console.error(err);
                    } else {
                        var data = JSON.parse(resp.text);
                        self.setState({quotations: data});
                        console.clear();

                    }
                });
        
    }
    render() {


        return (
                <div>
                
                    <table className="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sample_number</th>
                                <th>File Value</th>
                                <th>30 Days</th>
                                <th>60 Days</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            { this.state.quotations.map((item) => {
                                            return <tr><td>{item.SAMPLE_NUMBER}</td><td>{item.FILE_VALUE}</td>
                                            <td><Sliderbutton samplenumber={item.SAMPLE_NUMBER} typeid="save30" disabled={this.state.disabled} /></td>
                                            <td><Sliderbutton samplenumber={item.SAMPLE_NUMBER} typeid="save60" /></td></tr>
                        })}</tbody>
                    </table>
                </div>

                            );
            }
        }
        ReactDOM.render(<InvoiceRep />, document.getElementById('invoiceroot'));


