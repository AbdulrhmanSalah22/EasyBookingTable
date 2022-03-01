import { Component, OnInit } from '@angular/core';

import { AbstractControl, FormBuilder, ValidatorFn, Validators } from '@angular/forms';
import {formatDate} from '@angular/common'
import { MealService } from 'src/app/shared/service/meal.service';

@Component({
  selector: 'app-reservation',
  templateUrl: './reservation.component.html',
  styleUrls: ['./reservation.component.css']
})
export class ReservationComponent implements OnInit {
vv:boolean=true;
  
  auth:boolean=true;
  // current=formatDate(new Date(), 'd-M-yyyy h:m:s a', 'en-US', '+0530');
  current=formatDate(new Date(), 'dd-MM-yyyy h:m', 'en-US', '+0530');
 book=this.fb.group({   
   start_time:['',[Validators.required]],  
   end_time:['',[Validators.required]],
comment:['',[Validators.required]],
 });
  constructor(private fb:FormBuilder,private reserve:MealService) { }
datetime=formatDate(new Date(), 'dd-MM-yyyy hh:mm:ss a', 'en-US', '+0530');
  ngOnInit(): void {
    // var currentDate = new Date();
    // var currentyear = new Date().getFullYear();
    // var currentmonth = new Date().getUTCMonth();    
    // console.log(formatDate(new Date(),'MM/dd/yyyy', 'en'));
      console.log("now "+formatDate(new Date(), 'dd-MM-yyyy hh:mm:ss a', 'en-US', '+0530'));
       // console.log(currentDate);
    this.check();
this.update();
  }
  onSubmit(reservation:any){
this.reserve.reserve(reservation.value).subscribe(
  (next)=>{console.log(next)},
  (error)=>{console.log(error)}
)
    console.log(reservation.value);
  }
  check(){
   let d="01-03-2022 05:20:29 AM";
   console.log(d);
    if(d<this.datetime){
      console.log("true");
    }
    else{
      console.log("false");
    }
  }
update(){
  let start=formatDate(this.book.get('start_time')?.value, 'dd-MM-yyyy hh:mm:ss a', 'en-US', '+0530');
  console.log(start);
  let end=formatDate(this.book.get('end_time')?.value, 'dd-MM-yyyy hh:mm:ss a', 'en-US', '+0530');
  console.log( end);
  if(start<end){
    this.vv=true;
  }
  else{
    this.vv=false;
  }
}

}
// import {formatDate} from '@angular/common';
// formatDate(new Date(), 'yyyy/MM/dd', 'en');
export class CustomeDateValidators {
  static fromToDate(fromDateField: string, toDateField: string, errorName: string = 'fromToDate'): ValidatorFn {
      return (formGroup: AbstractControl): { [key: string]: boolean } | null => {
          const fromDate = formGroup.get(fromDateField)!.value;
          const toDate = formGroup.get(toDateField)!.value;
         // Ausing the fromDate and toDate are numbers. In not convert them first after null check
          if ((fromDate !== null && toDate !== null) && fromDate > toDate) {
              return {[errorName]: true};
          }
          return null;
      };
  }
}
