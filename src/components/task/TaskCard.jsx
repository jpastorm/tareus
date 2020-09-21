import React from 'react'
import {Link} from 'react-router-dom'
const TaskCard = ({id_tasks,created_at,name,description}) => {
    return (
        <div className="card mb-2">
        <h5 className="card-header">{name}</h5>
        <div className="card-body">
          <h5 className="card-title">{created_at}</h5>
          <p className="card-text">{description}</p>
          
          <Link to={`./task/${id_tasks}`}>Más ..</Link>
        </div>
      </div>
    )
}

export default TaskCard
