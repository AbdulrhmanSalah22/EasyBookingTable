import { Component, OnInit } from '@angular/core';

import { FormBuilder, Validators } from '@angular/forms';
import {formatDate} from '@angular/common'
@Component({
  selector: 'app-reservation',
  templateUrl: './reservation.component.html',
  styleUrls: ['./reservation.component.css']
})
export class ReservationComponent implements OnInit {

  // auth=true;
  auth:boolean=true;

 book=this.fb.group({
    date:['',[Validators.required]],  
   start_time:['',[Validators.required]],  
   end_time:['',[Validators.required]]    
 })
  constructor(private fb:FormBuilder) { }
datetime=formatDate(new Date(), 'dd-MM-yyyy hh:mm:ss a', 'en-US', '+0530');;
  ngOnInit(): void {
    // var currentDate = new Date();
    // var currentyear = new Date().getFullYear();
    // var currentmonth = new Date().getUTCMonth();    
    // console.log(formatDate(new Date(),'MM/dd/yyyy', 'en'));
      console.log(formatDate(new Date(), 'dd-MM-yyyy hh:mm:ss a', 'en-US', '+0530'));
    // console.log(currentDate);
    this.check()
  }
  onSubmit(reservation:any){

    console.log(reservation.value);
  }
  check(){
   let d="02-03-2022 05:20:29 AM";
   console.log(d);
    if(d<this.datetime){
      console.log("true");
    }
    else{
      console.log("false");
    }
  }
}
// import {formatDate} from '@angular/common';
// formatDate(new Date(), 'yyyy/MM/dd', 'en');
