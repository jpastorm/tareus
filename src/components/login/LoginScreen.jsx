import React, { useContext } from 'react'
import { AuthContext } from '../../auth/authContext'
import { useForm } from '../../hooks/useForm'
import { types } from '../../types/types'
import { auth } from '../../utils/auth/auth'
import swal from 'sweetalert';

export const LoginScreen = ({history}) => {

    const { dispatch } = useContext(AuthContext)

    const [{email,password},handleInputChange] = useForm({
        email:'',
        password:''
    })
    const handleSubmit=(e)=>{
        

        e.preventDefault()

        const lastPath = localStorage.getItem("lastPath") || "/";

        const payload = {
            type:types.login,
            payload:{
                email,
                password
            }
        }
    
            const res = auth(payload)
            res.then((result)=>{
                console.log(result)
                if(result){
                    dispatch({
                        type:types.login,
                        payload:result
                    })
                    history.replace(lastPath);
                }else{
                    swal("Error", "Invalid credentials", "error");
                }
                
            })

            
            
        }      
    
    return (
        <div className="row vh-100 align-items-center mx-auto justify-content-center">
            <div className="col-sm-6">
                <h1>Login</h1>
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="exampleInputEmail1">Email</label>
                        <input 
                        type="email" 
                        className="form-control" 
                        id="exampleInputEmail1" 
                        aria-describedby="emailHelp" 
                        placeholder="Enter email"
                        name="email"
                        value={email}
                        onChange={handleInputChange}
                        autoComplete="off"/>                        
                    </div>
                    <div className="form-group">
                        <label htmlFor="exampleInputPassword1">Password</label>
                        <input 
                        type="password" 
                        className="form-control" 
                        id="exampleInputPassword1" 
                        placeholder="Password"
                        name="password"
                        value={password}
                        onChange={handleInputChange}/>
                    </div>                    
                        <button type="submit" className="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    )
}
