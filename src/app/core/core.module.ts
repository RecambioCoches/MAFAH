import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RepuestoService } from './repuesto.service';
import { HttpClientModule } from '@angular/common/http';

// Import for loading & configuring in-memory web api
import { InMemoryWebApiModule } from 'angular-in-memory-web-api';
import { RepuestoData } from './repuesto-data';

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    HttpClientModule,
    InMemoryWebApiModule.forRoot(RepuestoData),
  ],
  providers: [RepuestoService],
})
export class CoreModule {}
