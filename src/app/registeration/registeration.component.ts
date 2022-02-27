import { Component, OnInit } from '@angular/core';
import { AbstractControl, FormBuilder, FormControl, FormGroup, ValidationErrors, ValidatorFn, Validators } from '@angular/forms';
// import {confirmPassword1} from '../shared/confirmPassword'
import { MealService } from '../shared/service/meal.service';
@Component({
  selector: 'app-registeration',
  templateUrl: './registeration.component.html',
  styleUrls: ['./registeration.component.css']
})
export class RegisterationComponent implements OnInit {  
registeForm=this.fb.group({
 name:['',[Validators.required,Validators.minLength(3),Validators.pattern("[A-Za-z]{1,32}")]],
  email:['',[Validators.required,Validators.email]],
  phone:['',[Validators.required,Validators.pattern("^01[0-2,5]{1}[0-9]{8}$")]],
  password:['',Validators.required],
  ConPass:['',Validators.required],  
});


  constructor(private fb:FormBuilder,private signUP:MealService) { }

  ngOnInit(): void {
    
  }
  onSubmit(signup:any){
    // console.log(signup.value);  
    //   this.signUP.sendData2(signup.value).subscribe(
    //   (next)=>{console.log(next)},
    //   (error)=>{console.log(error)}
    // );
  
  }
 
  
  
}
