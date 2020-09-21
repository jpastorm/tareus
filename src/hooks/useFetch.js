import { useState, useEffect, useRef } from "react";

export const useFetch = (url) => {
  const isMounted = useRef(true);
  const [state, setState] = useState({
    data: null,
    loading: true,
    error:null,
  });
  useEffect( () => {
    return () => {
        isMounted.current = false;
    }
}, [])

  useEffect(() => {
    console.log("UseEffect")
    const { token } = JSON.parse(localStorage.getItem("user"));
    setState({ data: null, loading: true });

    fetch(url, {
      headers: {
        "Content-Type": "application/json",
        Authorization: "bearer " + token,
      },
    })
      .then((resp) => resp.json())
      .then((data) => {

        if ( isMounted.current ) {
          setState({
            data,
            loading: false,
            error:null,
          });
      }
        
      }).catch(error=>{
        if ( isMounted.current ) {
          setState({
            data:null,
            loading: false,
            error:error,
          });
        }
      });
  }, [url]);

  return state;
};
