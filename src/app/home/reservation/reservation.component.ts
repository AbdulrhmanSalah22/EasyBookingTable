import { Component, OnInit } from '@angular/core';

import { FormBuilder, Validators } from '@angular/forms';
import {formatDate} from '@angular/common'
import { UserService } from 'src/app/shared/service/user.service';
@Component({
  selector: 'app-reservation',
  templateUrl: './reservation.component.html',
  styleUrls: ['./reservation.component.css']
})
export class ReservationComponent implements OnInit {

  Auth!:boolean
 book=this.fb.group({
    date:['',[Validators.required]],  
   start_time:['',[Validators.required]],  
   end_time:['',[Validators.required]]    
 })
  constructor(private fb:FormBuilder, private UserService:UserService) { }

  ngOnInit(): void {
    this.UserService.Auth.subscribe(Auth=>{
      this.Auth=Auth
      })
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
