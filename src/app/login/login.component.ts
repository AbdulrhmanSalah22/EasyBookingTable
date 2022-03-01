import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { MealService } from '../shared/service/meal.service';
import { UserService } from '../shared/service/user.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {


  constructor(private fb:FormBuilder,private lohin_ser:MealService,private router:Router , private UserService:UserService) { }
  loginForm=this.fb.group({
     email:['',[Validators.required,Validators.email]],  
    password:['',[Validators.required]],      
  })
  ngOnInit(): void {
  }
  onSubmit(signin:any){
    // console.log(signin.value);
    // this.lohin_ser.sendData(signin.value).subscribe(
    //   (next)=>{console.log(next)
    //     // localStorage.setItem('token' , next.token)
    //   },
    //   (error)=>{
    //     if(error){
    //       console.log(error);
    //     // this.router.navigateByUrl('#'+"reserve");
    //     // this.router.navigate(["/"])
    //     // this.router.navigate(["/signup"])
    //   }}
    // );


    this.UserService.login(signin.value).subscribe(
      (next)=>{console.log(next)
        
        // localStorage.setItem('token' , next.token)
      },
      (error)=>{console.log(error)}
    )
  }
}
