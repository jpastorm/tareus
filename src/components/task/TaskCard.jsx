import React from 'react'

const TaskCard = ({created_at,name,description}) => {
    return (
        <div className="card mb-2">
        <h5 className="card-header">{name}</h5>
        <div className="card-body">
          <h5 className="card-title">{created_at}</h5>
          <p className="card-text">{description}</p>
          <a href="#" className="btn btn-primary">Ir</a>
        </div>
      </div>
    )
}

export default TaskCard
