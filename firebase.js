// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAxSmq7q60Vh7hgCzt4UFikK8pTCeMlFPw",
  authDomain: "login-99f78.firebaseapp.com",
  projectId: "login-99f78",
  storageBucket: "login-99f78.appspot.com",
  messagingSenderId: "603459039234",
  appId: "1:603459039234:web:27aa384d35e9e95623b71b",
  measurementId: "G-R95S18765K"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);