import React, { useState } from 'react'
import { useNavigate } from 'react-router-dom'
import Footer from './Footer'
import Navbar from './Navbar'
import axios from 'axios'

function AddProduct() {
  const navigate=useNavigate()
  const [values,setValues]=useState({
    sku:'',
    prodName:'',
    price:'',
    switcher:'',
    size:'',
    weight:'',
    height:'',
    width:'',
    length:''
  })
  const handleSave=(event)=>{
    event.preventDefault()
    console.log(values)
    let formData= new FormData()

    formData.append('sku',values.sku)
    formData.append('prodName',values.prodName)
    formData.append('price',values.price)
    formData.append('switcher',values.switcher)
    formData.append('size',values.size)
    formData.append('weight',values.weight)
    formData.append('height',values.height)
    formData.append('width',values.width)
    formData.append('length',values.length)
    
    axios({
        method:'post',
        url:'http://localhost/product1/model/',
        // url:'https://productlist008.000webhostapp.com/',
        data: formData,
        config: { headers :{'Content-Type': 'multipart/form-data'}}
    })
    .then(response=>console.log(response)) && navigate('/') && window.location.reload()
    .catch(error=>console.log(error))
  }

  const handleCancel=()=>{
    navigate('/')
  }
  const handleChange=(e)=>{
    setValues({...values,[e.target.name]:e.target.value})
  }
  return (
    <div className='h-screen'>
      <Navbar title="Product Add" btn1="Save" btn2='Cancel' action1={handleSave} action2={handleCancel} />
      <div className='h-4/5 mx-5'>
          <form className='mt-10 '>
            <div className='flex space-x-5 items-center mb-5'>
              <label className='text-md'>SKU</label>
              <input type="text" name="sku" className='border border-black px-3 py-1 outline-none' onChange={handleChange} />
            </div>
            <div className='flex space-x-5 items-center mb-5'>
              <label className='text-md'>Name</label>
              <input type="text" name="prodName" className='border border-black px-3 py-1 outline-none' onChange={handleChange} />
            </div>
            <div className='flex space-x-5 items-center mb-5'>
              <label className='text-md'>Price</label>
              <input type="text" name='price' className='border border-black px-3 py-1 outline-none' onChange={handleChange} />
            </div>
            <div className="flex items-center space-x-5 mb-5">
                <label htmlFor="">SWITCHER</label>
                <select name="switcher" className='py-3 px-2 bg-gray-50 outline-none' onChange={handleChange} id="productType">
                    <option value="">Type Switcher</option>
                    <option  value="DVD">DVD</option>
                    <option value="Book">BOOK</option>
                    <option value="Furniture">FURNITURE</option>
                </select>
            </div>
            {
              (values.switcher==="DVD") ? 
              <div className='input selected' id="DVD">
                  <div className='flex items-center space-x-5 mb-5'>
                      <label htmlFor="">Size (MB)</label>
                      <input type="text" id="size" className='border border-black px-3 py-1 outline-none' onChange={handleChange} name="size"/>
                  </div>
                  <span className='ml-5'>Please Provide size in MB format<b className='text-red-500'>*</b></span>
              </div> :
              (values.switcher ==="Book") ?
              <div className='input selected' id="Book">
                  <div className='flex space-x-5 items-center mb-5'>
                      <label htmlFor="">Weight (KG)</label>
                      <input type="text" id="weight" className='border border-black px-3 py-1 outline-none' onChange={handleChange} name="weight"/>
                  </div>
                  <span className='ml-5'>Please provide weight in KG format<b className='text-red-500'>*</b></span>
              </div> : (values.switcher ==="Furniture")?
              <div className='input selected' id="Furniture">
                  <>
                  <div className='flex space-x-5 items-center mb-5'>
                      <label htmlFor="">Height (CM)</label>
                      <input type="text" id="height" className='border border-black px-3 py-1 outline-none' onChange={handleChange} name="height"/>
                  </div>
                  <div className='flex space-x-5 items-center mb-5'>
                      <label htmlFor="">Width (CM)</label>
                      <input type="text" id="width" className='border border-black px-3 py-1 outline-none' onChange={handleChange} name="width"/>
                  </div>
                  <div className='flex space-x-5 items-center mb-5'>
                      <label htmlFor="">Length (KG)</label>
                      <input type="text" id="length" className='border border-black px-3 py-1 outline-none' onChange={handleChange} name="length"/>
                  </div>
                  </>
                  <span className='ml-5'>Please provide weight in HxWxL format <b className='text-red-500'>*</b></span>
              </div> :
              <div></div>
            }
          </form>
      </div>
      <Footer />
    </div>
  )
}

export default AddProduct