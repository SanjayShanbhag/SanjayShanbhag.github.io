<!DOCTYPE html>
<html>
  <head>
       <meta charset="UTF-8">
       <title>Clarividencia</title>
       <link rel="stylesheet" type="text/css" href="CSS/style.css">
       <script src="https://unpkg.com/react@15/dist/react.min.js"></script>
       <script src="https://unpkg.com/react-dom@15/dist/react-dom.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.24.0/babel.js"></script>
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
        <div id="root"></div>
        <script type="text/babel">
            
            function TopName(props){
                const styleObject = {
                    color: '#FAFAFA',
                    textAlign: 'center'
                }
                const imgStyleObject = {
                    width: "80",
                    height: "40"
                }
                return (
                    <div className="container topLoad">
                        <h1 style={styleObject}><img src="images/logo.png" style={imgStyleObject}/>  {props.message}</h1>
                    </div>
                )
            }
            class GetNumber extends React.Component{
                constructor(props){
                    super(props);
                    this.state = {value: '', result: '', imge: 'guess.png', status: 0, colE: '#00C853', colM: '#FAFAFA', colH: '#FAFAFA', chance: ''};

                    this.handleChange = this.handleChange.bind(this);
                    this.handleSubmit = this.handleSubmit.bind(this);
                    this.playAgain = this.playAgain.bind(this);
                    this.hard = this.hard.bind(this);
                    this.medium = this.medium.bind(this);
                    this.easy = this.easy.bind(this);
                }
                handleChange(event){
                    if(!isNaN(event.target.value)){
                        this.setState({value: event.target.value});
                    }
                } 
                playAgain(event){
                    this.randm = Math.floor(Math.random() * (10 - 1 + 1)) + 1;
                    this.chances = 0;
                    this.setState({value: '', result: '', imge: 'guess.png', status: 0, colE: '#00C853', colH: '#FAFAFA', colM: '#FAFAFA', chance: ''})   
                }
                easy(){
                    this.randm = Math.floor(Math.random() * (10 - 1 + 1)) + 1;
                    this.chances = 0;
                    this.setState({colE: '#00C853', colH: '#FAFAFA', colM: '#FAFAFA', value: '', result: '', imge: 'guess.png', status: 0, chance: ''})
                }
                medium(){
                    this.randm = Math.floor(Math.random() * (50 - 1 + 1)) + 1;
                    this.chances = 0;
                    this.setState({colM: '#00C853', colE: '#FAFAFA', colH: '#FAFAFA', value: '', result: '', imge: 'guess.png', status: 0, chance: ''})
                }
                hard(){
                    this.randm = Math.floor(Math.random() * (100 - 1 + 1)) + 1;
                    this.chances = 0;
                    this.setState({colH: '#00C853', colE: '#FAFAFA', colM: '#FAFAFA', value: '', result: '', imge: 'guess.png', status: 0, chance: ''})
                }
                componentDidMount(){
                    this.randm = Math.floor(Math.random() * (10 - 1 + 1)) + 1;
                    this.chances = 0;
                }
                handleSubmit(event){
                    console.log(this.randm);
                    //alert('The Number Submitted Was: '+ this.state.value);
                    if(this.state.value < this.randm){
                        if((this.randm-this.state.value) <= 5){
                            this.setState({result: 'Ooh, Very Close!', imge: 'bigger.png'});    
                        }else{
                            this.setState({result: 'Bigger', imge: 'bigger.png'});
                        }
                        this.chances = this.chances + 1;
                    }else if(this.state.value > this.randm){
                        if((this.state.value-this.randm) <= 5){
                            this.setState({result: 'Ooh, Very Close!', imge: 'smaller.png'});    
                        }else{
                            this.setState({result: 'Smaller', imge: 'smaller.png'});
                        }
                        this.chances = this.chances + 1;
                    }else{
                        this.setState({result: 'You Win!!', imge: 'win.png', status: 1, chance: this.chances+' Chances'});
                    }
                    event.preventDefault();
                }
                
                render(){
                    const stYl = {
                        textAlign: 'center'
                    }
                    const rowStyleE = {
                        border: 'solid',
                        borderWidth: '2',
                        margin: '1',
                        marginBottom: '5',
                        backgroundColor: this.state.colE,
                        cursor: 'pointer',
                        borderColor: '#636363'
                    }
                    const rowStyleM = {
                        border: 'solid',
                        borderWidth: '2',
                        margin: '1',
                        marginBottom: '5',
                        backgroundColor: this.state.colM,
                        cursor: 'pointer',
                        borderColor: '#636363'
                    }
                    const rowStyleH = {
                        border: 'solid',
                        borderWidth: '2',
                        margin: '1',
                        marginBottom: '5',
                        backgroundColor: this.state.colH,
                        cursor: 'pointer',
                        borderColor: '#636363'
                    }
                    return(
                        <div>
                        <div className="row">
                            <div className="col-md-4 col-sm-4 col-lg-4"> 
                                <div style={rowStyleE} onClick={this.easy}>
                                <h4 style={stYl}>Easy</h4>
                                </div>
                            </div>
                            <div className="col-md-4 col-sm-4 col-lg-4">
                                <div style={rowStyleM} onClick={this.medium}>
                                <h4 style={stYl}>Medium</h4>
                                </div>
                            </div>
                            <div className="col-md-4 col-sm-4 col-lg-4">
                                <div style={rowStyleH} onClick={this.hard}>
                                <h4 style={stYl}>Hard</h4>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <form onSubmit = {this.handleSubmit}>
                            <input className="form-control" value={this.state.value} onChange={this.handleChange} type="text"/>
                            <br/>
                            <input className="btn btn-primary center-block" type="submit" value="Guess"/>
                        </form>
                        <br/>
                        <h3 style={stYl}>{this.state.result}</h3>
                        <h4 style={stYl}>{this.state.chance}</h4>
                        <br/>
                        <img src={'images/'+this.state.imge} className="center-block" width="80" height="80"/>
                        <br/>
                        {this.state.status?(<input className="btn btn-primary center-block" onClick={this.playAgain} type="submit" value="Play Again"/>):''}
                        </div>
                    );
                }
            }   
            const element = <TopName message="Clarividencia"/>;
            ReactDOM.render(element, document.getElementById('topCol'));
            const element1 = <GetNumber/>
            ReactDOM.render(element1, document.getElementById('nex'));
        </script>
        <div class="container-fluid back">
            <div class="topCol" id="topCol">
                
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-4 col-md-4">
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div id="nex">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                    </div>
                </div>
            </div> 
        </div>
  
  </body>
</html>