import React from "react";
import { Redirect, Route, Switch } from "react-router-dom";
import { HomeScreen } from "../components/home/HomeScreen";
import { TaskScreen } from "../components/task/TaskScreen";
import Navbar from "../ui/Navbar";
export const DashboardRouter = () => {
  return (
    <>
      <Navbar />
      <div className="container mt-2">
        <Switch>
          <Route exact path="/home" component={HomeScreen} />
          <Route exact path="/task/:id" component={TaskScreen} />
          <Redirect to="/home" />
        </Switch>
      </div>
    </>
  );
};
