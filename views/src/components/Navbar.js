import React from 'react'

function Navbar({title,btn1,btn2,action1,action2}) {
  return (
    <div className='flex items-center px-5 bg-gray-300 sticky z-10 top-0 justify-between py-5 border-black border-b-2'>
        <span className='text-2xl'>{title}</span>
        <div className='flex items-center space-x-10'>
            <button className='px-3 py-2 border' onClick={action1}>{btn1}</button>
            <button className='px-3 py-2 border' onClick={action2}>{btn2}</button>
        </div>
    </div>
  )
}

export default Navbar