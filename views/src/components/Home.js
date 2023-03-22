import React, { useEffect,useState,useRef } from 'react'
import { useNavigate } from 'react-router-dom'
import Footer from './Footer'
import Navbar from './Navbar'
import Product from './Product'
import axios  from 'axios'
function Home() {
  const [values,setValues]=useState([])
  const [isChecked,setIsChecked]=useState([])
  const divRef=useRef(null)
    const navigate=useNavigate()

    const handleDelete=()=>{
      let ids=isChecked.values()
      for(let id of ids){
        axios({
          method:'post',
          url:'http://localhost/product1/model/?delete='+id
          // url:'https://productlist008.000webhostapp.com/?delete='+id
        })
        .then(res=>{
          if(res.status === 200){
            window.location.reload()
          }
        })
        .catch(err=>console.log(err))
      }
    }


    useEffect(()=>{
        // const url="https://productlist008.000webhostapp.com/" 
        const url='http://localhost/product1/model/'
        axios.get(url).then(res=>{
          setValues(res.data)
        }).catch(err=>console.log(err))

    
    },[values])
    console.log(values)
  return (
    <div className='h-screen'>
        <Navbar title='Product List' btn1='ADD' btn2='MASS DELETE' action1={()=>navigate('/addProduct')} action2={handleDelete}/>
        <div className='products h-4/5 mx-5 mt-4 grid grid-cols-4 grid-rows-3 overflow-y-auto gap-5 py-2'>
          {
            values.map((value,key)=>
              <Product
              ref={divRef}
              id={value.id}
              handleChange={(e)=>(
                e.target.checked ? setIsChecked((prev)=>[...prev,value.id]):''
            )}
              key={key}
              sku={value.sku}
              prodName={value.names}
              price={value.price}
              switcher={value.switcher}
              size={value.size}
              lengths={value.lengths}
              height={value.height}
              weights={value.weights}
              width={value.width}
              />
            )
          }    
        
        </div>
        <Footer />
    </div>
  )
}

export default Home