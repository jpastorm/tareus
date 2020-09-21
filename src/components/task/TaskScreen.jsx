import React from 'react'
import { useParams, Redirect } from "react-router-dom";
import { useFetch } from '../../hooks/useFetch';

export const TaskScreen = ({history}) => {
  const { id } = useParams();
  console.log(id);
  const {data,loading,error} = useFetch(`http://127.0.0.1:8000/api/tasks/${id}`)
  console.log(data)
  
  if(error != null){
    return <Redirect to="/" />;
  }
  
  const {
    created_at,
    description,
    id_tasks,
    name,
  } = !!data && data
  return (
    <>
    <div>
    { 
      loading
      ?(
        <div className="alert alert-info text-center">Loading..</div>
        ):(
          <div>
          {
            <div>
            <p>{name}</p>
            <p>{created_at}</p>
            <p>{description}</p>
            </div>
          }
          </div>
          )
        } 
        
        </div>
        
        </>
        );
      };