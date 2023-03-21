import Home from "./components/Home";
import {BrowserRouter as Router,Routes,Route} from 'react-router-dom'
import AddProduct from "./components/AddProduct";

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Home/>}/>
        <Route path="/addProduct" element={<AddProduct />} />
      </Routes>
    </Router>
  );
}

export default App;
