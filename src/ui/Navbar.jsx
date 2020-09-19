import React, { useContext } from 'react'
import {Link,NavLink,useHistory} from 'react-router-dom'
import { AuthContext } from '../auth/authContext';
import { types } from '../types/types';
const Navbar = () => {
  const {
    dispatch,
  } = useContext(AuthContext);
  const history = useHistory();
    const handleLogout = () =>{
      history.replace("/login");
      dispatch({
      type: types.logout,
    });
    localStorage.removeItem("user");
    }
    return (
        <nav className="navbar navbar-expand-sm navbar-dark bg-dark">
          <Link className="navbar-brand" to="/">
            Asociaciones
          </Link>
    
          <div className="navbar-collapse">
            <div className="navbar-nav">
              <NavLink
                activeClassName="active"
                className="nav-item nav-link"
                exact
                to="/home"
              >
                Home
              </NavLink>
            </div>
          </div>
    
          <div className="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul className="navbar-nav ml-auto">
              <span className="nav-item nav-link text-info">jpastorm</span>
              <NavLink
                activeClassName="active"
                className="nav-item nav-link"
                exact
                to="/login"
              ></NavLink>
              <button className="nav-item nav-link btn" onClick={handleLogout}>
                Logout
              </button>
            </ul>
          </div>
        </nav>
      );
    };

export default Navbar
