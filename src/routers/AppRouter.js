import React, { useContext } from "react";
import { BrowserRouter as Router, Switch } from "react-router-dom";
import { AuthContext } from "../auth/authContext";
import { LoginScreen } from "../components/login/LoginScreen";
import { DashboardRouter } from "./DashboardRouter";
import { PrivateRoute } from "./PrivateRouter";
import { PublicRouter } from "./PublicRouter";
const AppRouter = () => {
  const { user } = useContext(AuthContext);
  console.log(user);
  return (
    <Router>
      <Switch>
        <PublicRouter
          exact
          path="/login"
          component={LoginScreen}
          isAuthenticated={user.logged}
        />
        <PrivateRoute
          path="/"
          component={DashboardRouter}
          isAuthenticated={user.logged}
        />
      </Switch>
    </Router>
  );
};

export default AppRouter;
