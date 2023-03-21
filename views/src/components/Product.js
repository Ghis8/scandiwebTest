import React from 'react'

const Product=React.forwardRef(({handleChange,sku,prodName,price,switcher,size,lengths,height,weights,width},ref)=> {
  return (
    <div className='px-4  py-4 border flex space-x-8 items-start ' ref={ref}>
        <input type="checkbox" onChange={handleChange} className="mt-2 cursor-pointer"/>
        <div className='product__items flex flex-col space-y-1 mt-2'>
            <span value={sku}>{sku}</span>
            <span>{prodName}</span>
            <span>{price}$</span>
            {
              (switcher === "DVD") ? 
              <span>Size: {size}MB</span>: (switcher === "Book") ?
              <span>Weight: {weights}KG</span> : (switcher === "Furniture") ?
              <span>Dimension: {height+"x"+width+"x"+lengths}</span> 
              :<span></span>
            }
        </div>
    </div>
  )
})

export default Product