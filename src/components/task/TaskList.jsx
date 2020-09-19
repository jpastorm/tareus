import React from 'react'
import { useFetch } from '../../hooks/useFetch'
import TaskCard from './TaskCard'

const TaskList = () => {
    const {data:result,loading} = useFetch(`http://127.0.0.1:8000/api/tasks`)
    
    const {data} = !!result && result
    console.log(data)
    
    return (
        <>
        <div>
        {loading
          ?(
            <div className="alert alert-info text-center">Loading..</div>
          ):(
            <div>
              {
                data.map((task)=>(
                  <TaskCard key={task.id_tasks} {...task}/>
                  ))
              }
            </div>
          )
        }
        
        </div>
        
        </>
    )
}
export default TaskList;