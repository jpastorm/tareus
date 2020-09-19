import React from "react";
import { Redirect, Route, Switch } from "react-router-dom";
import { HomeScreen } from "../components/home/HomeScreen";
import Navbar from "../ui/Navbar";
export const DashboardRouter = () => {
  return (
    <>
      <Navbar />
      <div className="container mt-2">
        <Switch>
          <Route exact path="/home" component={HomeScreen} />
          <Redirect to="/home" />
        </Switch>
      </div>
    </>
  );
};
