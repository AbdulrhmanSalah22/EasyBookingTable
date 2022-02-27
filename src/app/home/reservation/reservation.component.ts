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

  ngOnInit(): void {
    // var currentDate = new Date().getDate();
    // var currentyear = new Date().getFullYear();
    // var currentmonth = new Date().getUTCMonth();    
    console.log(formatDate(new Date(),'MM/dd/yyyy', 'en'));
  }
  onSubmit(reservation:any){
    console.log(reservation.value);
  }
}
// import {formatDate} from '@angular/common';
// formatDate(new Date(), 'yyyy/MM/dd', 'en');