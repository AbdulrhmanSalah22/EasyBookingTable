import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Subject } from 'rxjs';
import { Meal } from '../model/meal';
import { Reservation } from '../model/reservation';
import { OrderService } from './order.service';

@Injectable({
  providedIn: 'root',
})
export class ReservationService {
  reservationData=new Subject<Reservation>()
  SendData:any[]=[]

  TableCheck(data: Reservation) {
    return this.Http.post<Reservation>(
      'http://localhost:8000/api/get-table',
      data
    )
  }
  saveReservation(order:Meal[]) {
    this.SendData.push(order) 
    console.log( this.SendData)  
     const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    if(this.SendData.length==2){
      this.Http.post<Reservation>(
        'http://localhost:8000/api/check',this.SendData,{headers} ).subscribe(
          (ResData) => {
           console.log(ResData)
          },
          (error) => {
            console.log(error);
          }
        );
      this.SendData.length=0
      console.log(this.SendData)
    }else{
      this.router.navigateByUrl('#'+'reserve'); 
      this.SendData.length=0
      console.log(this.SendData)  
   }
  }
  ColectData(data:Reservation){
    this.SendData.push(data)
      console.log(this.SendData)
  }
  constructor(private Http: HttpClient,private OrderService:OrderService,private router:Router) {}
}
