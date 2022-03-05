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
  checked=new Subject<boolean>()
  reservationData=new Subject<Reservation>()
  SendData:any[]=[]

  TableCheck(data: Reservation) {
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.post<Reservation>(
      'http://localhost:8000/api/get-table',
      data , {headers}
    )
  }
  saveReservation(order:Meal[],price:any) {

    this.SendData.push(order,price) 
    console.log( this.SendData)  
     const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    if(this.SendData.length==3){
      this.Http.post<Reservation>(
        'http://localhost:8000/api/reserv',this.SendData,{headers} ).subscribe(
          (ResData) => {
           console.log(ResData)
           this.OrderService.DeleteOrder()
           this.checked.next(true)
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

  GetUserReservation(){
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
   return this.Http.get<Reservation>(
      'http://localhost:8000/api/get-reservation',{headers})
  }
  constructor(private Http: HttpClient,private OrderService:OrderService,private router:Router) {}
}
