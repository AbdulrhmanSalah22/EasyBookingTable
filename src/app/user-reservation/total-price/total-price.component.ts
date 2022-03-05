import { Component, Input, OnInit } from '@angular/core';
import { ReservationService } from 'src/app/shared/service/reservation.service';

@Component({
  selector: 'app-total-price',
  templateUrl: './total-price.component.html',
  styleUrls: ['./total-price.component.css']
})
export class TotalPriceComponent implements OnInit {
  @Input()id!:any
  data!:any

  constructor(private ReservationService:ReservationService) { }

  ngOnInit(): void {
    // this.ReservationService.GetUserReservation().subscribe((data:any)=>{
    //  this.data=data[0].order[this.id-1]
    //  console.log(this.data)
    // })

    this.ReservationService.GetUserReservation().subscribe((data:any)=>{
      const index =data[0].order.findIndex(
        (element:any) => element.id ==this.id
        
     )
     this.data=data[0].order[index]
    console.log(index) } );
     console.log(this.id)

  }
  }


