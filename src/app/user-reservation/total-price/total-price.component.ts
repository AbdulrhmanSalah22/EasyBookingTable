import { Component, Input, OnInit } from '@angular/core';
import { ReservationService } from 'src/app/shared/service/reservation.service';

@Component({
  selector: 'app-total-price',
  templateUrl: './total-price.component.html',
  styleUrls: ['./total-price.component.css'],
})
export class TotalPriceComponent implements OnInit {
  @Input() id!: any;
  @Input() data: any;

  constructor(private ReservationService: ReservationService) {}

  ngOnInit(): void {
    const index = this.data.order.findIndex(
      (element: any) => element.id == this.id
    );
    this.data = this.data.order[index];
  }
}
