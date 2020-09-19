import { useState, useEffect } from "react";

export const useFetch = (url) => {
  const [state, setState] = useState({
    data: null,
    loading: true,
  });
  useEffect(() => {
    console.log(JSON.parse(localStorage.getItem("user")));
    const { token } = JSON.parse(localStorage.getItem("user"));
    console.log(token);
    setState({ data: null, loading: true });

    fetch(url, {
      headers: {
        "Content-Type": "application/json",
        Authorization: "bearer " + token,
      },
    })
      .then((resp) => resp.json())
      .then((data) => {
        setState({
          data,
          loading: false,
        });
      });
  }, [url]);

  return state;
};
