<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/reactAndRedux.css">


<div class="image" alt='react.js'></div>

<div class="containBlog">
        <div class='intro'>
                Redux holds a state globally. It is kinda like a basket that everything goes into and 
                you can grab values from any component within your React application. In React
                there is state and props. If you want to pass the state into another component through props that component
                must be a child of the other one to pass the state in. With Redux,you can just pass 
                everything into the redux store and then grab values from any component.
                Here are the fundumentals of Redux below
        </div>
        <ul>
           
            <li><h4>Store</h4> The Store is the global state. You import {createStore} from redux in index.js usually, import the combineReducers
            variable from another file, and the reduxDevTools so you can see it in the browser console. </li>
            <li><h4>Provider</h4> makes the Redux store available to any nested components that have been wrapped in the connect function. You wrap
            the App in Provider tags and give it one property which is the store. Provider must be imported in the same file with createStore from react-redux. </li>
            <li><h4>Actions</h4> are functions you create that fire out the Dispatch information to the reducers. These Actions are in their own folder and get imported into 
            the file they will be used in. First they get passed into the connect's second paremeter which then makes them availabe fo use in the props of that component.
            tOnce the action / actions are imported it gets assigned to an event suh as onClick, don'tt forget to use props.actonName. You can also use destructuring in the 
            props parameter using curly bracets so you don't have to use the props keyword.</li>
            <li><h4>Dispatch</h4> is an object fired  from an action to the reducer that give information about the type and the payload.
            Type usually is a string or a variable that has a string telling it what kind of action for example increase or decrease. Payload is usually the info passed into 
            the actions paremeter like a name or which current element </li>
            <li><h4>Reducers</h4> Recieve the dispatch information from an action and modify the state according to what has been dispatched to it. Reducers have 
            two parameters, the first is the innitial state, then the second is usually called action which catches the actions dispatched object. Inside the reducer we use a switch 
            statement and if the action.type is increase for example, we then modify the state by returning state + 1 for example. There must be a return so make sure there is a default.</li>
            <li><h4>Innitial State</h4> is an object we make above our reducer and make it as the default of the reducers state paremeter. When we modify the state inside the reducer
             we can use the spread operator to keep the changes</li>
            <li><h4>Combine Reducers</h4> In our reducers folder we make an index.js file and import the combineReducers function from redux. combineReducers takes an object with key 
            value pair so we can grab each reducer from the connect functions first parameters mapStateToProps function. 
             </li>
            <li><h4>Connect</h4> is a fuction, "higher order function", that you import from React-redux dependency that allows you to connect a component to the store. 
            </li>
            <li><h4>mapStateToProps</h4> The conventional name of the function that goes in the first parameter of connect that makes the store available in the props of the
             current component. this function is created right above the connect function and it spits out an object with a key value pairs that grab the state and the name of the reducer or reducers from combineReducers in key and value pairs</li>
            <li><h4>MapDispatchToProps</h4>Pushes the actions dispatch to the reducer inside the store as well as makes it availabe in the props. The actions are first imported in from
             their files and then pushed into the second parameter of the connect function</li>
           
        
        
        </ul>
    
    
    

 
   

   
  
</div>
<?php include 'footerForBlogs.php'; ?>