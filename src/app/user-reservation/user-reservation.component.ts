import { Component, OnInit } from '@angular/core';
import { ReservationService } from '../shared/service/reservation.service';

@Component({
  selector: 'app-user-reservation',
  templateUrl: './user-reservation.component.html',
  styleUrls: ['./user-reservation.component.css']
})
export class UserReservationComponent implements OnInit {
  data!:any
  OrderData!:any

  constructor(private ReservationService:ReservationService) { }

  ngOnInit(): void {
    this.ReservationService.GetUserReservation().subscribe((data:any)=>{
      // for(let i=1;i<3;i++){
        this.OrderData=data[0]
        this.data=data.splice(1)
        console.log( this.data)


      // }
    })
  }

}
